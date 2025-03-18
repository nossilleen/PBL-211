def hitung_luas_segitiga(alas, tinggi):
    return 1/2*alas*tinggi

try:
    alas = float(input("Masukkan nilai alas:" ))
    tinggi = float(input("Masukkan nilai tinggi: "))

    luas = hitung_luas_segitiga(alas, tinggi)
    print("Berikut adalah nilai luas segitiga", luas)
except ValueError:
    print("haha coba lagi")