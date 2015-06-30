<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Socialize;
use Request;
use Session;
use DB;
use Redirect;
use App\User;
use Auth;
use App\Perkuliahan;
use App\AnggotaGrup;
use App\Mhskelas;
use App\Mahasiswa;
use App\Dosen;
use Hash;

class GoogleAuth extends Controller
{
    public function getUploadForm()
    {
        return view('frontend.includes.storage-upload');
    }

    public function getClient()
    {
        $client = new \Google_Client();
        $client->setClientId('620980086153-jg176821cr1vmjd1kl55r48khca6385d.apps.googleusercontent.com');
        $client->setClientSecret('HmA7K-2zcvTZbXCk8GC3erFJ');
        $client->setRedirectUri('http://localhost:8000/redirect');
        $client->setScopes(array('https://www.googleapis.com/auth/drive','https://www.googleapis.com/auth/plus.me','https://www.googleapis.com/auth/userinfo.email'));
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');
        return $client;
    }

    public function index()
    {
        //Session::forget('access_token');
        $id = Session::get('user');
        $data = array(
            'title' => 'Collaborative Learning',
            'mahasiswa' => DB::table('mahasiswa')->where('nim', $id)->first(),
            'dosen' => DB::table('dosen')->where('nip', $id)->first(),
            'kelas' => ['' => '-- Pilih kelas --'] + Perkuliahan::where('nip', '=', $id)->lists('kodekelas', 'kodekelas')
        );
        return view('frontend.layouts.storage-master')->with($data);
    }

    public function auth()
    {
        return redirect($this->getClient()->createAuthUrl());
    }

    public function redirect()
    {
        $client = new \Google_Client();
        $client->setClientId('620980086153-jg176821cr1vmjd1kl55r48khca6385d.apps.googleusercontent.com');
        $client->setClientSecret('HmA7K-2zcvTZbXCk8GC3erFJ');
        $client->setRedirectUri('http://localhost:8000/redirect');
        $client->setScopes(array('https://www.googleapis.com/auth/drive','https://www.googleapis.com/auth/plus.me','https://www.googleapis.com/auth/userinfo.email'));
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');

        if(Request::has('code'))
        {
            $cred = $client->authenticate(Request::input('code'));
            $token = $client->getAccessToken();
            Session::put('access_token', $token);

            $user = User::find(Session::get('user_id'));
            $user->access_token = $token;
            $user->save();

            /*if(Auth::user()->role == "mahasiswa" ){
                return Redirect::to('u/mahasiswa/storage');
            }else{
                return Redirect::to('u/dosen/storage');
            }*/
            return "Autentikasi sukses, tutup window ini dan refresh halaman parent";

        }
    }

    public function makeFile()
    {
        $client = $this->getClient();

        //Token Expired dan Session masih aktif
        if ($client->isAccessTokenExpired() && Session::has('access_token')) {
            $getToken = User::find(Session::get('user_id'));
            $tempToken = json_decode($getToken->access_token);
            $client->refreshToken($tempToken->refresh_token);
            Session::put('access_token', $client->getAccessToken());

            $getToken->refresh_token = $client->getAccessToken();
            $getToken->save();

            $service = new \Google_Service_Drive($client);
            $file = new \Google_Service_Drive_DriveFile();
            $title = Request::input('judul');
            $mimetype = Request::input('mimetype');
            $kelas = Request::input('kelas');
            $grup = Request::input('grup');

            $parentId = $this->getFolder($service, 'Tugas');

            $file->setTitle($kelas.'_'.$grup.'_'.$title);
            $file->setMimeType($mimetype);

            if ($parentId != null) {
                $parent = new \Google_Service_Drive_ParentReference();
                $parent->setId($parentId);
                $file->setParents(array($parent));
            }
            $createdFile = $service->files->insert($file);

            $fileId = $createdFile->getId();
            //Mendapatkan Email Anggota Grup
            $arrList = AnggotaGrup::with('mhs')->where('id_grup', '=', $grup)->get();
            $temp = array();
            $email = array();
            for($i = 0; $i < count($arrList); $i++)
            {
                $temp[$i] = $arrList[$i];
                $email[$i] = $temp[$i]->mhs->email;
            }
            //dd($email);
            //Share Dokumen
            for($i = 0; $i < count($email); $i++)
            {
                $this->sharing($service, $fileId, "user", "writer", $email[$i]);
            }
            return "sukses";
        }
    }

    public function disconnect()
    {
        Session::forget('access_token');
        $user = User::find(Session::get('user_id'));
        $user->access_token = "";
        $user->refresh_token = "";
        $user->save();
    }

    function insertFile($service, $parentId) {

      $filename = Request::file('file');
      $kelas = Request::input('kelas');
      $mimeType = $filename->getClientMimeType();
      $title = $kelas.'_'.$filename->getClientOriginalName();
      $description = $filename->getClientMimeType();

      $file = new \Google_Service_Drive_DriveFile();
      $file->setTitle($title);
      $file->setDescription($description);
      $file->setMimeType($mimeType);

      // Set the parent folder.
      if ($parentId != null) {
        $parent = new \Google_Service_Drive_ParentReference();
        $parent->setId($parentId);
        $file->setParents(array($parent));
      }

      try {
        $data = file_get_contents($filename);

        $createdFile = $service->files->insert($file, array(
          'data' => $data,
          'mimeType' => $mimeType,
          'uploadType' => 'media'
        ));

        // Uncomment the following line to print the File ID
        // print 'File ID: %s' % $createdFile->getId();

        return $createdFile;
      } catch (Exception $e) {
        print "An error occurred: " . $e->getMessage();
      }
    }

    public function uploadFile1()
    {
        $file = Request::file('file');
        $kelas = Request::input('kelas');
        return $file;
    }

    public function uploadFile()
    {
         $client = $this->getClient();
         $kelas =  Request::input('kelas');

        //Token Expired dan Session masih aktif
        if ($client->isAccessTokenExpired() && Session::has('access_token')) {
            $getToken = User::find(Session::get('user_id'));
            $tempToken = json_decode($getToken->access_token);
            $client->refreshToken($tempToken->refresh_token);
            Session::put('access_token', $client->getAccessToken());
            $getToken->refresh_token = $client->getAccessToken();
            $getToken->save();

            $service = new \Google_Service_Drive($client);
            $parentId = $this->getFolder($service, 'Materi');

            $this->insertFile($service,$parentId);

            $fileId = $this->insertFile($service,$parentId)->getId();
            //Mendapatkan Email Mhs Kelas
            $arrList = Mhskelas::with('mhs')->where('kodekelas', '=', $kelas)->get();
            $temp = array();
            $email = array();
            for($i = 0; $i < count($arrList); $i++)
            {
                $temp[$i] = $arrList[$i];
                $email[$i] = $temp[$i]->mhs->email;
            }

            //Share Dokumen
            for($i = 0; $i < count($email); $i++)
            {
                $this->sharing($service, $fileId, "user", "reader", $email[$i]);
            }
        } 
    }

    public function makeFolder($file, $service, $title, $parentId)
    {
        $file->setTitle($title);
        $file->setDescription("Folder ini akan dibuat secara otomatis ketika anda melakukan autorisasi dengan aplikasi Collaborative Learning");
        $file->setMimeType("application/vnd.google-apps.folder");

        if ($parentId != null) {
            $parent = new \Google_Service_Drive_ParentReference();
            $parent->setId($parentId);
            $file->setParents(array($parent));
        }
        return $service->files->insert($file);
    }

    public function sharing($service, $fileId, $type, $role, $value)
    {
        $newPermission = new \Google_Service_Drive_Permission();
        $newPermission->setValue($value);
        $newPermission->setType($type);
        $newPermission->setRole($role);
        try {
            return $service->permissions->insert($fileId, $newPermission);
        } catch (Exception $e) {
            print "An error occurred: " . $e->getMessage();
        }
        return NULL;
    }

    public function kumpulTugas($kelas, $fileId, $fileName, $tugasId)
    {
        $client = $this->getClient();

        //Token Expired dan Session masih aktif
        if ($client->isAccessTokenExpired() && Session::has('access_token')) {
            $getToken = User::find(Session::get('user_id'));
            $tempToken = json_decode($getToken->access_token);
            $client->refreshToken($tempToken->refresh_token);
            Session::put('access_token', $client->getAccessToken());
            $getToken->refresh_token = $client->getAccessToken();
            $getToken->save();

            $service = new \Google_Service_Drive($client);

            //Ubah Nama Dokumen
            $newFileName = $fileName.'#id:'.$tugasId.'t';
            $this->renameFile($service, $fileId, $newFileName);

            //Mendapatkan Email Dosen
            $user = Perkuliahan::with('dosen')->where('kodekelas', '=', $kelas)->first();

            //Share Dokumen
            $this->sharing($service, $fileId, "user", "writer", $user->dosen->email);
        }
    }

    function renameFile($service, $fileId, $newTitle) {
        try {
            $file = new \Google_Service_Drive_DriveFile();
            $file->setTitle($newTitle);

            $updatedFile = $service->files->patch($fileId, $file, array(
                'fields' => 'title'
            ));

            return $updatedFile;
        } catch (Exception $e) {
            print "An error occurred: " . $e->getMessage();
        }
    }

    public function getFolderItem($service, $folderId, $kelas, $grup, $tugasId)
    {
        $result = array();
        $pageToken = NULL;

        if($grup == 0)
        {
            $title = $kelas;
        }else if($grup == -1)
        {
            $title = '#id:'.$tugasId.'t';
        }else
        {
            $title = $kelas.'_'.$grup;
        }

        do {
            try {
                $parameters = array();
                $parameters['q'] = "trashed = false and (sharedWithMe and title contains '$title') or title contains '$title' and '$folderId' in parents";
                if ($pageToken) {
                    $parameters['pageToken'] = $pageToken;
                }
                $files = $service->files->listFiles($parameters);
                $result = array_merge($result, $files->getItems());
                $pageToken = $files->getNextPageToken();
            } catch (Exception $e) {
                print "An error occurred: " . $e->getMessage();
                $pageToken = NULL;
            }
        } while ($pageToken);
        return $result;
    }

    public function getParent($service)
    {
        $result = array();
        $pageToken = NULL;

            do {
                try {
                    $parameters = array();
                    $parameters['q'] = "trashed = false and mimeType = 'application/vnd.google-apps.folder' and title = 'Collaborative Learning'";
                    if ($pageToken) {
                        $parameters['pageToken'] = $pageToken;
                    }
                    $files = $service->files->listFiles($parameters);
                    $result = array_merge($result, $files->getItems());
                    $pageToken = $files->getNextPageToken();
                } catch (Exception $e) {
                    print "An error occurred: " . $e->getMessage();
                    $pageToken = NULL;
                }
            } while ($pageToken);

         return $result;
    }

    public function getFolder($service, $title)
    {
        $result = array();
        $pageToken = NULL;
        $parentId = $this->getParent($service)[0]->id;
        do {
            try {
                $parameters = array();
                $parameters['q'] = "trashed = false and mimeType = 'application/vnd.google-apps.folder' and title = '$title' and '$parentId' in parents";
                if ($pageToken) {
                    $parameters['pageToken'] = $pageToken;
                }
                $files = $service->files->listFiles($parameters);
                $result = array_merge($result, $files->getItems());
                $pageToken = $files->getNextPageToken();
            } catch (Exception $e) {
                print "An error occurred: " . $e->getMessage();
                $pageToken = NULL;
            }
        } while ($pageToken);

        return $result[0]->id;
    }

    public function getUser($folder, $kelas, $grup, $tugasId)
    {
        $client = $this->getClient();
        $getToken = User::find(Session::get('user_id'));

        //Token Expired dan Session masih aktif
        if ($client->isAccessTokenExpired() && $getToken->access_token != "") {
            $tempToken = json_decode($getToken->access_token);
            $client->refreshToken($tempToken->refresh_token);
            Session::put('access_token', $client->getAccessToken());
            $getToken->refresh_token = $client->getAccessToken();
            $getToken->save();


            $service = new \Google_Service_Drive($client);
            $googlePlus = new \Google_Service_Plus($client);
            $file = new \Google_Service_Drive_DriveFile();
            $userProfile = $googlePlus->people->get('me');
            $emails = $userProfile->getEmails();
            $photo = $userProfile->getImage();
            $userId = $userProfile->getId();

            /*$value = array("tokeknempel@gmail.com","nam.6arta@gmail.com");
            for ($i=0; $i < 2; $i++) { 
                    $this->sharing($service,$this->getParent($service)[0]->id,"user","reader",$value[$i]);
                }    */

            if (count($this->getParent($service)) == 0) {
                $this->makeFolder($file, $service, "Collaborative Learning", null);
                $this->makeFolder($file, $service, "Materi", $this->getParent($service)[0]->id);
                $this->makeFolder($file, $service, "Tugas", $this->getParent($service)[0]->id);
            }

            $result = $this->getFolderItem($service, $this->getFolder($service, $folder), $kelas, $grup, $tugasId);

            $data = array(
                //'token' => $token['access_token'],
                'email' => $emails[0]->value,
                'photo' => $photo->url,
                'userId' => $userId,
                'result' => $result,
                'title' => 'test'
            );
         //User belum melakukan autentikasi
        } else if (!Session::has('access_token') && $getToken->access_token == "") {
            $id = Session::get('user');
            if(Auth::user()->role == "mahasiswa")
            {
                $pengguna =  Mahasiswa::where('nim', '=', $id)->first();
            }else{
                $pengguna =  Dosen::where('nip', '=', $id)->first();
            }

            $data = array(
                'title' => 'test',
                'user' => $pengguna->email,
            );
        //Session tidak aktif tapi user telah melakukan autentikasi
        } else if (!Session::has('access_token') &&  $client->getAccessToken()){
            Session::put('access_token', $client->getAccessToken());
            $data = array(
                'title' => 'test',
            );
        }else{
            $client->setAccessToken(Session::get('access_token'));
            $data = array(
                'title' => 'test',
            );
        }
        return view('frontend.includes.storage-content')->with($data);
    }
}