<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use App\Models\Folder;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        $inputs = $request->all();
        Folder::create($inputs);
        $folder = Folder::where('user_id', $inputs['user_id'])->first();

        return redirect()->route('tasks.index', [
            'id' => $folder['id'],
        ]);
    }
}
