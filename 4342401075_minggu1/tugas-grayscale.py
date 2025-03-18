R = float(input("Masukkan nilai R : "))
G = float(input("Masukkan nilai G : "))
B = float(input("Masukkan nilai B : "))

grayscale = ( (0.3 * R) + (0.59 * G) + (0.11 * B) )

toGray = grayscale

print("Hasil grayscale : ", toGray)
