Set The Database
=========================
1. Buka xampp control dan start Apache and MySQL

2. Buka localhost/phpmyadmin pada browser, buat database baru dengan nama 'masakuy' kemudian import masakuy.sql yang tersedia dalam file zip.

3. Masukan folder MasaKuy ke dalam folder xampp/htdocs

4. Buka Android Studio Project MasaKuy, buka MainActivity.java dan ubah IP Address pada SharedPreferences (sekitar line 42) menjadi IP Address anda

5. Buka CommentListAdapter.java dan ubah IP Address pada PutData dengan IP Address anda. Lakukan hal yang sama dengan RecipeListAdapter.java

Note:
- Post resep dan edit profil hanya bisa dilakukan jika gambar dimasukkan.
- Fitur Log Out ada di menu utama