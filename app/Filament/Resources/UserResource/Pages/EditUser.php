<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;
//AÑADIDOS POR MI............
/*use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;*/

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
}
