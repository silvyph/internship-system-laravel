// Dalam DatabaseSeeder atau custom seeder
public function run()
{
    $interns = Intern::all();
    
    foreach ($interns as $intern) {
        $intern->update([
            'mapel1' => 'Nilai berdasarkan data existing',
            'mapel2' => 'Nilai berdasarkan data existing', 
            'skill_teknis' => 'Nilai berdasarkan data existing',
            'sertifikasi' => 'Nilai berdasarkan data existing'
        ]);
    }
}