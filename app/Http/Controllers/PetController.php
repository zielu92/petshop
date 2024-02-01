<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetByStatusRequest;
use App\Http\Requests\StorePetRequest;
use App\Services\Pets;

class PetController extends Controller
{

    public function index()
    {
        return view('pets.index');
    }

    public  function show(Pets $pets, $id)
    {
        if(is_numeric($id)) {
            $pet = $pets->getPetsById($id);
            return view('pets.show', compact('pet'));
        }
        return view('pets.index');
    }

    public function petByStatus(Pets $pets, PetByStatusRequest $request)
    {
        $pets = $pets->getPets($request->input('status'));
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Pets $pets, StorePetRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $pets->addPet($data);
        return redirect('pet.index')->with('successMsg','Pet has been added');;
    }

    public function edit(Pets $pets, $id)
    {
        if(is_numeric($id)) {
            $pet = $pets->getPetsById($id);
            return view('pets.edit', compact('pet'));
        }
        return redirect('pet.index');
    }

    public function update(Pets $pets, StorePetRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $pets->updatePet($data);
        return redirect('pet.index')->with('successMsg','Pet has been updated');
    }

    public function destroy(Pets $pets, $id)
    {
        if(is_numeric($id)) {
            $removed = $pets->removePet($id);
            if($removed->code==200) {
                return redirect('pet.index')->with('successMsg','Pet has been deleted');
            }
        }
        return redirect('pet.index')->with('errorMsg','Pet has not been deleted');;
    }

}
