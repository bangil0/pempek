<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;
use Simpeg\Model\Pegawai;
use Simpeg\Model\JabatanStruktural;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';

    protected $fillable = [
        'title',
        'description'
    ];

    public function jabatan()
    {
        return $this->hasMany('Simpeg\Model\JabatanStruktural', 'unit_kerja_id', 'id');
    }

    public function pegawai()
    {
        return $this->hasMany('Simpeg\Model\Pegawai', 'unit_kerja_id', 'id');
    }

    public function sub_unit_kerja()
    {
        return $this->hasMany('Simpeg\Model\UnitKerja', 'parent_id', 'id');
    }

    public function list_jabatan_level($unit_kerja_id, $parent_level)
    {
        return JabatanStruktural::where('unit_kerja_id', $unit_kerja_id)->where('parent_level', $parent_level)->pluck('id')->toArray();
    }

    public function duk()
    {
        return $this->hasMany('Simpeg\Model\DukView')->orderBy('golongan', 'desc')
					->orderBy('tmt_golongan', 'desc')
					->orderBy('level', 'desc')
					->orderBy('masa_kerja', 'desc')
					->orderBy('jumlah_diklat', 'desc')
					->orderBy('pendidikan', 'desc')
					->orderBy('usia', 'desc');
    }

    public function countParentPegawaiByPendidikan($jabatan_struktural_id, $pendidikan)
    {
        $child_list_id = self::where('parent_id', $jabatan_struktural_id)->pluck('id')->toArray();
        return Pegawai::whereIn('jabatan_struktural_id', $child_list_id)
                    ->where('pendidikan_akhir', $pendidikan)
                    ->count();
    }

    public function countSubPegawaiByPendidikan($jabatan_struktural_id, $pendidikan)
    {
        return Pegawai::where('jabatan_struktural_id', $jabatan_struktural_id)
                    ->where('pendidikan_akhir', $pendidikan)
                    ->count();
    }

    public function countParentPegawaiByJabatan($jenis_jabatan, $unit_kerja_id=null, $golongan=array())
    {
        $child_list_id = JabatanStruktural::where('unit_kerja_id', $unit_kerja_id)->pluck('id')->toArray();
        if ($jenis_jabatan === 'struktural') {
            return Pegawai::where('jenis_jabatan', 'Struktural')
                    ->whereIn('jabatan_struktural_id', $child_list_id)
                    ->whereIn('golongan_id_akhir', $golongan)
                    ->count();
        }
        else {
            return Pegawai::whereIn('jenis_jabatan', ['Fungsional Tertentu', 'Fungsional Umum'])
                    ->whereIn('jabatan_struktural_id', $child_list_id)
                    ->whereIn('golongan_id_akhir', $golongan)
                    ->count();
        }
    }

    public function countSubPegawaiByJabatan($jenis_jabatan, $jabatan_struktural_id=null, $golongan=array())
    {
        $child_list_id = JabatanStruktural::where('parent_id', $jabatan_struktural_id)->pluck('id')->toArray();
        $parent_list_id = JabatanStruktural::where('id', $jabatan_struktural_id)->pluck('id')->toArray();
        $merge = array_merge($child_list_id,$parent_list_id);
        if ($jenis_jabatan === 'struktural') {
            return Pegawai::where('jenis_jabatan', 'Struktural')
                    ->whereIn('jabatan_struktural_id', $merge)
                    ->whereIn('golongan_id_akhir', $golongan)
                    ->count();
        }
        else {
            return Pegawai::whereIn('jenis_jabatan', ['Fungsional Tertentu', 'Fungsional Umum'])
                    ->whereIn('jabatan_struktural_id', $merge)
                    ->whereIn('golongan_id_akhir', $golongan)
                    ->count();
        }
    }

    public function countSubPegawaiByUsiaEselon($eselon, $jabatan_struktural_id=null, $golongan=array())
    {
        if ($jenis_jabatan === 'struktural') {
            return Pegawai::where('jenis_jabatan', 'Struktural')
                    ->where('jabatan_struktural_id', $jabatan_struktural_id)
                    ->whereIn('golongan_id_akhir', $golongan)
                    ->count();
        }
        else {
            return Pegawai::whereIn('jenis_jabatan', ['Fungsional Tertentu', 'Fungsional Umum'])
                    ->where('jabatan_struktural_id', $jabatan_struktural_id)
                    ->whereIn('golongan_id_akhir', $golongan)
                    ->count();
        }
    }
}
