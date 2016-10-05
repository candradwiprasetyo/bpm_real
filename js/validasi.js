// JavaScript Document
function validasi_telp(string){
	var pattern =/[0-9]/;
	if(pattern.test(string)==false){
		return false;
		}
	}
function validasi_email(string){
var pattern1=/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/;
		var 	pattern2=/^.+\@(\[?)[a-zA-Z0-9\-\_\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/;
		if((!pattern1.test(string) && pattern2.test(string))==false)
		{
		return false;}
}

function err_null(rena,adri){
	er = 0;
	var desi = new Array;
	var thea = new Array;
	for(x in rena){
	if(rena[x]==""){
		er=er +1;
	thea[x]=adri[x];
	}
	
		}
	if(er>0){
		return thea;
				}
		else {return true;}              
	}
	
function err_pesan(arrx,typex){
	switch(typex){
	case("nullx"):

	for (x in arrx){
		ad = document.getElementById(arrx[x]);
		ad.innerHTML = " Mohon di isi";
			}
	break;
	case("email"):
	for (x in arrx){
				ad = document.getElementById(arrx[x]);
				ad.innerHTML = " Email tidak valid";
				} 
	break;
	
	case("tenor"):
	for(x in arrx){
			ad = document.getElementById(arrx[x]);
			ad.innerHTML = " Tenor tidak valid";
		}
	break;
	
	case("dp"):
	for(x in arrx){
			ad = document.getElementById(arrx[x]);
			ad.innerHTML = " Uang Muka tidak valid";
		}
	break;
	
	case("telp"):
	for (x in arrx){
				ad = document.getElementById(arrx[x]);
				ad.innerHTML = " Nomor Telp tidak valid";
				} 
	break;	
	
	case("password"):
	for (x in arrx){
				ad = document.getElementById(arrx[x]);
				ad.innerHTML = " Password Tidak Cocok";
				}
	break;
	
	case("cap"):
	for (x in arrx){
				ad = document.getElementById(arrx[x]);
				ad.innerHTML = " Kode Salah";
				}
	break;
	
	case("jawaban"):
	for (x in arrx){
				ad = document.getElementById(arrx[x]);
				ad.innerHTML = " Isi jawaban untuk mengenali akun Anda";
				}
	break;
	case("login"):
	for (x in arrx){
				ad = document.getElementById(arrx[x]);
				ad.innerHTML = " Username atau Password salah";
				}
	break;
	case("tgl"):
	for (x in arrx){
				ad = document.getElementById(arrx[x]);
				ad.innerHTML = " Isi tanggal dengan benar";
				}
	break;
	case("bersih"):
	for (x in arrx){
				ad = document.getElementById(arrx[x]);
				ad.innerHTML = "";
				} 
	break;
			}
	
	}


function validasi_contact(){
	err_no =0;
	var formx = document.form_contact;
	nama = formx.nama.value;
	emailx = formx.email.value;
	negara = formx.negara.value;
	judul_pesan = formx.judul_pesan.value;
	pesan = formx.pesan.value;
	adt = Array(nama,emailx,negara,judul_pesan,pesan);
	ads = Array("pesan_nama_con","pesan_email_con","pesan_negara_con","pesan_judul_pesan_con","pesan_pesan_con");
	adrix = err_null(adt,ads);
	err_pesan(ads,"bersih");
	if(adrix!=true){
		err_pesan(adrix,"nullx");
		err_no++;
		} 
	if(validasi_email(emailx)==false){
		adr= Array("pesan_email_con");
		err_pesan(adr,"email");
		err_no++;
	}
		
	if(err_no!=0){
		return false;
		}	else return true;
	}

