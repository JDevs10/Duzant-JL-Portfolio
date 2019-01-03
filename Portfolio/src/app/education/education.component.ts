import { Component, OnInit } from '@angular/core';
import { EducationService } from '../education.service';
import { Education } from '../mock/education';
import { Home } from '../mock/home';
import { HomeService } from '../home.service';

@Component({
  selector: 'app-education',
  templateUrl: './education.component.html',
  styleUrls: ['./education.component.css']
})
export class EducationComponent implements OnInit {

  homes: Home[];
  educations: Education[];
  
  constructor(private educationService: EducationService,
              private homeService: HomeService) { }

  getEducation(){
    this.educationService.getEducation().subscribe(educations => this.educations = educations);
  }

  getHome(){
    this.homeService.getHomes().subscribe(homes => this.homes = homes);
  }

  ngOnInit() {
    this.getEducation();
    this.getHome();
  }

}
