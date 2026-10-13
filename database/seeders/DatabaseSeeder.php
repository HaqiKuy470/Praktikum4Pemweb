public function run(): void
{
    // Urutan penting: kategori dan tag harus ada sebelum berita
    $this->call([
        KategoriSeeder::class,
        TagSeeder::class,
        BeritaSeeder::class,
    ]);
}