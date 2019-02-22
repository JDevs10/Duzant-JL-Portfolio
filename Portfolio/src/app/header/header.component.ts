import { Component, OnInit } from '@angular/core';
import { HomeService } from '../home.service';
//import { Random } from '../mock/random';
import { timeout } from 'q';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  //randomN: Random;

  constructor(private homeService: HomeService) { }

  ngOnInit() {
  }

  /*
  AdminAuthentification(){
    // generate a random 32 digits
    let randomStringLength = Math.floor(Math.random()*90)+22;

    let possibleSmallLetters = "abcdefghijklmnopqrstuvwxyz";
    let possibleBigLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let possibleNumbers = "0123456789";
    let s = "'\'";
    let possibleSymbols = "~!@#$%&*()_+-={}|[]"+s+";:<>?,./";
    var text = "";
    var possible = possibleSmallLetters+possibleBigLetters+possibleNumbers+possibleSymbols;

    for (var i = 0; i < randomStringLength; i++){
      text += possible.charAt(Math.floor(Math.random() * possible.length));
    }

    this.homeService.sendAdminRandom(text).subscribe(random => this.randomN = random);

    setTimeout(()=>{
      this.homeService.getAdminNotification().subscribe(random => this.randomN = random);
      alert("here : "+this.randomN.notification);
    }, 3000);

  }*/

  myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

  currentActive(screenView: String){
    var w = [];
    w[0] = document.getElementById("navHome").className;
    w[1] = document.getElementById("navSkills").className;
    w[2] = document.getElementById("navEducation").className;
    w[3] = document.getElementById("navProjects").className;
    w[4] = document.getElementById("navContact").className;

    var x = ["navHome", "navSkills", "navEducation", "navProjects", "navContact"];

    for(var y = 0; y < w.length; y++){
      // console.log("x["+y+"] = "+x[y]);
      if(w[y] == "nav-item nav-link active"){
        document.getElementById(x[y]).className = "nav-item nav-link";
        // console.log("getElementById("+x[y]+").className =  nav-item nav-link");
      }
    }
    
    var z = document.getElementById("nav"+screenView);
    if(z.className == "nav-item nav-link"){
      z.className += " active";
    }else{
      z.className = "nav-item nav-link";
    }
    //console.log("nav id: nav"+screenView+"\n"+y.className.toString());
  }

}
