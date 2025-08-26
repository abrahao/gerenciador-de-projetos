<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Employee extends Model
{
    use HasFactory;

    //protected $fillable = ['nome', 'cpf', 'data_contratacao', 'data_demissao'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected function dataContratacao(): Attribute
    {
        return Attribute::make(
                get: fn ($value) => Carbon::make($value)->format('d/m/Y'),
                set: fn ($value) => Carbon::make($value)->format('Y-m-d'),
            );
    }

    /**
     * Mapeia o relacionamento com o endereço
     * Um funcionário tem um endereço
     * 
     * @return HasOne 
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Um funcionário pertence a muitos projetos
     * 
     * @return BelongsToMany 
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_project', 'employee_id', 'project_id');
    }

    /**
     * Apaga o funcionário e seu endereço
     * 
     * @return bool
     */

    public function apagar(): bool
    {
        try {
            DB::beginTransaction();

            $this->address()->delete();
            $this->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        return true;
    }
}
