<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        // 1. Validation
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Récupération du fichier
        $file = $request->file('image');

        if (!$file) {
            return back()->with('error', 'Erreur : Aucun fichier détecté.');
        }

        // 3. Préparation du dossier
        $uploadDir = public_path('assets/images/partners');
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // 4. Récupération EXTREMITÉMENT sécurisée de l'extension
        $originalName = $file->getClientOriginalName();
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        
        if (empty($extension)) {
            $extension = 'jpg';
        }

        // 5. Création du nom final
        $filename = 'partner_' . time() . '.' . $extension;
        $dbPath = 'assets/images/partners/' . $filename;

        // 6. Déplacement du fichier
        $file->move($uploadDir, $filename);

        // 7. Sauvegarde en BDD (On utilise 'image' comme colonne)
        Partner::create([
            'name' => 'Partenaire-' . time(), 
            'image' => $dbPath,
            'order' => 0 
        ]);

        return back()->with('success', 'Image ajoutée avec succès.');
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
        if ($partner) {
            // Suppression de l'image du disque
            if ($partner->image && file_exists(public_path($partner->image))) {
                unlink(public_path($partner->image));
            }
            $partner->delete();
        }
        return back()->with('success', 'Partenaire supprimé.');
    }
}