<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        request()->validate([
            'column' => 'in:name,,email',
            'direction' => 'in:asc,desc',
        ]);

        return view('dashboard', [
            'users' => User::query()
                ->where('admin', '=', false)
                ->search(request()->search)
                ->when(
                    request()->filled('column'),
                    fn (Builder $q) => $q->orderBy(
                        request()->column,
                        request()->direction ?: 'asc'
                    )
                )
                ->get(),
        ]);
    }
}
