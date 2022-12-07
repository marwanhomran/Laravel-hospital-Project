<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Department;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Room $room)
    {
        return view('rooms.index', [
            'rooms' => $room->paginate(7)
        ]);
    }

    public function show(Room $room)
    {

        return view('rooms.show', ['room' => $room]);
    }

    public function create(Department $departments)
    {

        return view('rooms.create', ['departments'=>$departments->all()]);
    }

    public function store(Room $room, Request $request)
    {
        $rom = $request->all(); //get all the field by it names from the form...

        $room::create([
            'beds_number' => data_get($rom, 'beds_number'),
            'department_id' => data_get($rom, 'department_id'),
        ]);

        return redirect()->route('rooms.index');
    }

    public function edit(Room $room,Department $departments)
    {

        return view('rooms.edit', ['room' => $room,'departments'=>$departments->all()]);

    }

    public function update(Room $room, Request $request)
    {
        $request->only(['beds_number', 'department_id']);
        $rom = $request->all();
        $room->update([
            'beds_number' => data_get($rom, 'beds_number'),
            'department_id' => data_get($rom, 'department_id'),
        ]);

        return redirect()->route('rooms.index');

    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }
}
