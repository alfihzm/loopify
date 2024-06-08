Table "user" {
  "id" int(11) [primary key]
  "id_admin" int(11) 
  "id_staff" int(11) 
  "id_member" int(11) 
  "nama" varchar(128) 
  "lahir" date 
  "email" varchar(128) 
  "username" varchar(16) 
  "password" varchar(256) 
  "role_id" int(11) 
  "photo" varchar(128) 
  "no_telp" varchar(13) 
  "alamat" varchar(256) 
  "total_sampah" float 
  "total_koin" int(32) 
  "koin" int(11) 
  "alasan_ban" varchar(256) 
  "date_created" int(11) 
  "is_active" int(1) 
}

Ref: withdraw.id_member > user.id_member
Ref: transaction.id_member > user.id_member
Ref: review.id_member > user.id_member


withdraw {
  "id" int(11) 
  "id_member" int(11) 
  "username" varchar(128) 
  "nominal" int(16) 
  "tanggal" date 
  "jam" varchar(11) 
  "lokasi" varchar(64) 
  "metode" varchar(128) 
  "norek" varchar(128) 
  "catatan" varchar(128) 
  "status" varchar(32) 
  "koin1" int(16) 
  "koin2" int(16) 
}

Table "transaction" {
  "id" int(11) [primary key]
  "id_member" int(11) 
  "username" varchar(128) 
  "tanggal" date 
  "jumlah_botol" int(11) 
  "jumlah_kaleng" int(11) 
  "jumlah_kardus" int(11) 
  "total" int(11) 
  "totalkoin" int(16) 
  "totalkonversi" int(16) 
  "lokasi" varchar(128) 
  "catatan" varchar(128) 
  "status" varchar(32) 
  "tgl_validasi" date 
}




Table "review" {
  "id" int(11) 
  "id_member" int(11) 
  "nama" varchar(128) 
  "photo" varchar(128) 
  "tanggal" date 
  "review" varchar(512) 
}
