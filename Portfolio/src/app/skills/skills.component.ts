import { Component, OnInit } from '@angular/core';
import { SkillsService } from '../skills.service';
import { Skills } from '../mock/skills';
import { HomeService } from '../home.service';
import { from } from 'rxjs';
import { Home } from '../mock/home';

@Component({
  selector: 'app-skills',
  templateUrl: './skills.component.html',
  styleUrls: ['./skills.component.css']
})
export class SkillsComponent implements OnInit {

  homes: Home[];
  skills: Skills[];

  constructor(private skillsService: SkillsService,
              private homeService: HomeService) { }

  getHome(){
    this.homeService.getHomes().subscribe(homes => this.homes = homes);
  }

  getSkills(){
    this.skillsService.getSkills().subscribe(skills => this.skills = skills);
  }

  ngOnInit() {
    this.getHome();
    this.getSkills();
  }

}
