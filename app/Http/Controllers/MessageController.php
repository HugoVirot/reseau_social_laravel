<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validateur qui vérifie les champs
        // on valide les infos du formulaire en précisant les critères attendus
        $request->validate([
            'content' => 'required|min:5|max:500',
            'tags' => 'required|min:3|max:50',
            // 'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user(); // on récupère l'utilisateur connecté

        // *********** syntaxe 1 ******************
        $message = new Message; // on créé un nouveau message

        // pb de policies à régler
        // $this->authorize('create', $quack);

        // j'accède aux propriétés de mon message et je leur donne des valeurs
        $message->user_id = $user->id;
        $message->content = $request->input('content');
        $message->image = isset($request['image']) ? $request['image'] : null;
     //   $message->image = isset($request['image']) ? uploadImage($request['image']) : null;
        $message->tags = $request->input('tags');

        // je sauvegarde en base de données
        $quack->save();

        // *********** syntaxe 2 ******************
        // Quack::create([
        //     'user_id' => $user->id,
        //     'content' => $request->input('content'),
        //     'tags' => $request->input('tags'),
        //     'image' => isset($data['image']) ? uploadImage($data['image']) : null
        // ]);

        return redirect()->route('home')->with('message', 'Le quack a bien été sauvegardé');
        // création du message en base de données
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        // validateur qui vérifie les champs
        // modification du message en base de données
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
