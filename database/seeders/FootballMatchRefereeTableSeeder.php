<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FootballMatch;
use App\Models\Referee;

class FootballMatchRefereeTableSeeder extends Seeder
{
    public function run()
    {
        $matches = FootballMatch::all();  // Obtenir tous les matches
        $referees = Referee::all()->groupBy('poste');  // Regrouper les arbitres par poste

        DB::beginTransaction();  // Start a transaction
        try {
            foreach ($matches as $match) {
                foreach (['Central', 'Assistant', 'Fourth', 'VAR'] as $poste) {
                    if ($referees[$poste]->isEmpty()) {
                        continue;  // Si aucun arbitre n'est disponible pour un poste, sauter ce poste
                    }

                    // Sélectionner un arbitre au hasard parmi ceux disponibles pour ce poste
                    $referee = $referees[$poste]->random();

                    // Assigner cet arbitre au match
                    DB::table('football_match_referee')->insert([
                        'football_match_id' => $match->id,
                        'referee_id' => $referee->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);

                    // Retirer l'arbitre de la liste pour éviter de l'utiliser à nouveau dans le même match
                    $referees[$poste] = $referees[$poste]->reject(function ($r) use ($referee) {
                        return $r->id === $referee->id;
                    });
                }
            }
            DB::commit();  // Commit the transaction
        } catch (\Exception $e) {
            DB::rollBack();  // Roll back the transaction on any error
            throw $e;  // Re-throw the exception
        }
    }
}
