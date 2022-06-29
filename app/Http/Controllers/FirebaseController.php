<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-9d875-firebase-adminsdk-wltre-a1b8486a6c.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://laravelfirebase-9d875.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $newPost = $database
        ->getReference('blog/posts')
        ->push([
        'title' => 'Laravel FireBase Tutorial' ,
        'category' => 'Laravel'
        ]);
        echo '<pre>';
        print_r($newPost->getvalue());

        // //firebase
        // var firebaseConfig = {
        //     apiKey: "AIzaSyCCzb414iQnXw0-RiSfA6PKPN1SHaemhvs",
        //     authDomain: "siwi-2021.firebaseapp.com",
        //     projectId: "siwi-2021",
        //     storageBucket: "siwi-2021.appspot.com",
        //     messagingSenderId: "998153466595",
        //     appId: "1:998153466595:web:035b3cb5bc40b53ba5cbd6",
        //     measurementId: "G-X9TM927RCZ"
        //   };
        //   // Initialize Firebase
        //   firebase.initializeApp(firebaseConfig);
        //   firebase.analytics();
    }

}
