<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()   // visualizza elenco utenti
    {
        // visualizzazione dei dati di test da array

        /* return ['name' => 'Moreno',
                 'cognome' => 'Ghisellini',
                 'professione' => 'cazzone',
                ];  */

            //    primo metodo
       // return User::get();

                // secondo metodo
            return response()->Json(
                ['data'=> User::get(),
                 'Success'
                ]
            );
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   // non utilizzato - uso Angular
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)   // per inserire un utente - usato
    {


              //  eseguo Inserimento dell'utente -- funziona

        // inizializzo i parametri per l'aggiornamento
        $data = [];
        $message = '';
        try {
            $User = new User();
            $success = true;
            $postData = $request->except('id','_method');
            $postData['password'] =  Hash::make($postData['password'] ?? 'password');
            $User->fill($postData);
            $success = $User->save();
            $data = $User;
            $message = 'Inserimento eseguito con successo';
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return compact('data','message','success');



        /*  versione Hidran  + funziona  */
        /*
        $data = [];
        $message = '';
        try {
            $User = new User();
            $postData = $request->except('id', '_method');
            $postData['password'] = Hash::make($postData['password'] ?? 'password');
            $User->fill($postData);
            $success = $User->save();
            $data = $User;
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $success = true;
        }
        return compact('data', 'message', 'success');
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)  // visualizzare un utente per chiave - usato
    {

        try {
            return
                response()->json(['data'=>User::FindOrFail($id)]) ;
        } catch (\Exception $e) {
           return response(
               [
                'data'=>[],
                'Messaggio:' => 'Utente  Inesistente !! ',
               'a' => 'Selezionare un utente esistente ',
               'message '=> $e->getMessage()
                ]
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   // modifica utente - non Usato
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  eseguo aggiornamento dell'utente

        // inizializzo i parametri per l'aggiornamento
        $data = [];
        $message = '';
        try {
            $User = User::findOrFail($id);
            $success = true;
            // salva sulla variabile data i dati dalla richiesta (request)
            // ad eccezzione del campo id e del campo di comodo _method

            $postData = $request->except('id','_method');
            // imposto la crittografia alla password  (questo temporraneo)
            $postData['password'] =  Hash::make($postData['password'] ?? 'password');  // bcrypt('test');
            // eseguo l'aggiornamento
            $success = $User->update($postData);
            $data = $User;
            $message = 'Aggiornamento eseguito con successo';

        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }
        return compact('data','message','success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // per eliminare utente - usato
    {

        $data = [];
        $message = 'Cancellazione eseguita con successo !!';
        $success = true;
        try {
            $User = User::findOrFail($id);
            $data = $User;
            $success = $User->delete();
        } catch (\Exception $e) {
            $success = false;
            $message = 'Utente non trovato - Cancellazione non possibile';
        }
        return compact('data','message','success');

    }
}
