import { Component, OnInit } from '@angular/core';
import { JobsService } from '../jobs.service';
import { Job } from '../mock/jobs';

@Component({
  selector: 'app-jobs',
  templateUrl: './jobs.component.html',
  styleUrls: ['./jobs.component.css']
})
export class JobsComponent implements OnInit {

  jobs: Job[];

  constructor(private jobsService: JobsService) { }

  getJobs(){
    this.jobsService.getJobs().subscribe(jobs => this.jobs = jobs);
  }

  ngOnInit() {
    this.getJobs();
  }

}
