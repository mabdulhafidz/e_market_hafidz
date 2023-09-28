<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::orderBy('created_at', 'DESC')->get();
        return view('users.index')->with($data);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $userData = $request->all();
            $userData['password'] = bcrypt($request->input('password'));
    
            User::create($userData);
    
            DB::commit();
    
            return redirect('users')->with('success', 'Input data berhasil');
        } catch (\Exception $error) {
            DB::rollBack();
            return redirect('users')->withErrors(['message' => 'Terjadi kesalahan: ' . $error->getMessage()]);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(User $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('users', $user);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, $user)
    {
        try {
            DB::beginTransaction();
            
            // Verifikasi user yang ingin diupdate
            $userRecord = DB::table('users')->where('id', $user)->first();
            
            if (!$userRecord) {
                throw new \Exception('User not found');
            }
    
            // Ambil data dari request
            $userData = $request->validated();
    
            // Update data menggunakan Query Builder
            DB::table('users')
                ->where('id', $user)
                ->update($userData);
    
            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            DB::rollback(); // Batalkan transaksi jika ada kesalahan
            return redirect()->back()->withErrors(['message' => 'Terjadi kesalahan']);
        }
    }
    
// plan b
    // {
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    
    //     if ($request->has('password')) {
    //         $user->password = bcrypt($request->input('password'));
    //     }
    
    //     $user->save();
    
    //     return redirect()->route('users.index')->with('success', 'User updated successfully');
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
{
    try {
        DB::beginTransaction();
        $user->delete();
        DB::commit();
        return redirect('users')->with('success', 'Data berhasil dihapus!');
    } catch (QueryException | Exception | PDOException $error) {
        DB::rollBack();
        return "Terjadi kesalahan " . $error->getMessage();
    }
}

}
