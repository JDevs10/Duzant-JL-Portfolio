import { Component, OnInit } from '@angular/core';
import { ProjectsService } from '../projects.service';
import { Project } from '../mock/projects';

@Component({
  selector: 'app-my-projects',
  templateUrl: './my-projects.component.html',
  styleUrls: ['./my-projects.component.css']
})
export class MyProjectsComponent implements OnInit {

  projects: Project[];

  constructor(private projectsService: ProjectsService) { }

  getProjects(){
    this.projectsService.getPosts().subscribe(projects => this.projects = projects);
  }

  ngOnInit() {
    this.getProjects();
  }

}
