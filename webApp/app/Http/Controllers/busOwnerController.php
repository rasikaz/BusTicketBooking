<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class busOwnerController extends Controller
{
    public function createOwner(Request $request)
    {

        DB::insert('insert into owner (owner_id,name,nic,address,email,telephone,password) values(?,?,?,?,?,?,?)', [
            $request['token'],
            $request['name'],
            $request['nic'],
            $request['address'],
            $request['email'],
            $request['telephone'],
//            $request['account_num'],
            $request['password'],
        ]);

        $email=$request['email'];
        session()->put(['user'=>$email]);
//        return  $this->getHome($request['email']);
        return redirect('ownerhome')->with(['email'=>$email]);
    }





    public function signIn(Request $request)
    {
        $email = $request['email'];
        $passwordarray= DB::select("select password from owner where email=:e",['e'=>$email]);
        $password=$passwordarray[0]->password;


//        return $passwordarray;
        if ($password == $request['password']) {

            session()->put(['user'=>$email]);
            
            return redirect('ownerhome');
        } else {
            return redirect()->back();
        }

    }

    public function signOut(){
        session()->remove('user');
        return redirect('/');
    }

    public function getHome(Request $request){
        $email=session()->get('user');
        $bankdetails=$this->getAccountDetails($email);

        if($bankdetails==null){
            $message='You have not entered a bank account please enter your account here';
            $message2='';
            $true=FALSE;
            $namearray=DB::select('select name from owner where email=?',[$email]);
            $name=$namearray[0]->name;
        }else{
            $message='Your account number is: '.$bankdetails[0]->account_num;
            $message2='Your current balance is '.$bankdetails[0]->total;
            $true=TRUE;
            $name=$bankdetails[0]->name;
        }

        return  view('bus_owner.ownerhome')->with('email',$email)->with('name',$name)->with('message',$message)->with('message2',$message2)->with('true',$true);
    }
//    public function home($email){   
//        return view('bus_owner.ownerhome')->with('email',$email);
//    }
    
    public function addAccount(Request $request){
        $email=$request['email'];

        $account=$request['accountnum'];

        DB::insert('insert into bank_account (account_num,total) values (?,?)', [
            $account,
            0
        ]);

        DB::update('update owner set account_num=? where email=?',[$account,$email]);

    }

    public function getAccountDetails($email){

        $accontdetails=DB::select('select owner.name,owner.account_num,total from bank_account,owner where owner.account_num=bank_account.account_num and email=?',[$email]);
        return $accontdetails;
    }

}
