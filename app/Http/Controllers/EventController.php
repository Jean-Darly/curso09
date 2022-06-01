<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function idUserRole()
    {
        $user = auth()->user();
        if ($user) {
            $idUserRole = $user;
        } else {
            $idUserRole = false;
        }
        return $idUserRole;
    }

    public function uploadImage($request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            return $imageName;
        } else {
            return false;
        }
    }

    public function index()
    {
        $search = request('search');
        if ($search) {
            $events = Event::where(
                [
                    ['title', 'like', '%' . $search . '%']
                ]
            )->get();
        } else {
            $events = Event::all();
        }

        //função do usuario
        $role = $this->idUserRole();
        if ($role) {
            $role = $role->role;
        } else {
            $role = 0;
        }

        return view('welcome', [
            'events' => $events,
            'search' => $search,
            'role'   => $role
        ]);
    }


    public function store(Request $request)
    {

        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        // Image Upload
        $uploadImage = $this->uploadImage($request);
        if ($uploadImage) {
            $event->image = $uploadImage;
        }

        $user = $this->idUserRole();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {

        $event = Event::findOrFail($id);

        $user = $this->idUserRole(); //auth()->user();
        $hasUserJoined = false;

        if ($user) {

            $userEvents = $user->eventsAsParticipant->toArray();

            foreach ($userEvents as $userEvent) {
                if ($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function dashboard()
    {

        $user = $this->idUserRole(); //auth()->user();

        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view(
            'events.dashboard',
            ['events' => $events, 'eventsasparticipant' => $eventsAsParticipant]
        );
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        unlink('img/events/' . $event->image); //apaga arquivo do diretório

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id)
    {

        $user = $this->idUserRole(); //auth()->user();

        $event = Event::findOrFail($id);

        if ($user->id != $event->user_id) {
            return redirect('/dashboard');
        }

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request)
    {

        $data = $request->all();

        // Image Upload
        $uploadImage = $this->uploadImage($request);
        if ($uploadImage) {
            $data['image'] = $uploadImage;
        }

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvent($id)
    {

        $user = $this->idUserRole(); //auth()->user();

        //$user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }

    public function leaveEvent($id)
    {

        $user = $this->idUserRole(); //auth()->user();

        //$user->eventsAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento: ' . $event->title);
    }
}
