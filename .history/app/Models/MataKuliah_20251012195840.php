<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $guarded = ['id'];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function getAllMK()
    {
        return $this->all();
    }

    public function edit ($id){
        $mk = Matakuliah::findorFail ($id);
        return view ('edit_mk', ['title' => 'EDIT MATA KULIAH', 'mk' => $mk]);

    
    }
    public function update (Request $request ,$id){
        $request->validate ([
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:6',
        ]);
        
        $mk = Matakuliah::findorFail ($id);
        $mk->update ([
            'nama_mk' => $request-> input ('nama_mk'),
            'sks' => $request->input ('sks'),
        ]);

        return redirect()->to('/mata-kuliah')->with ('success', 'Data Berhasil Diperbarui');
    
    }

    public function destroy ($id){
        $mk = Matakuliah::findorFail ($id);
        $mk->delete();

        return redirect()->to('/mata-kuliah')->with ('success', 'Data Berhasil Dihapus');

    
    }

}
