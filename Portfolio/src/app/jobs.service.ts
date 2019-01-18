import { Injectable } from '@angular/core';
import { Job } from './mock/jobs';
import { Observable, of } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class JobsService {

  private url = 'http://localhost/JL-Portfolio-Angular/Symfony-API/public';

  constructor(private http: HttpClient) { }

  getJobs(): Observable<Job[]> {
    /*convertir cette methode pour utiller HttpClient
    return of(POSTS);*/
    return this.http.get<Job[]>(this.url+"/api/jobs", {headers: {'Content-Type': 'application/x-www-form-urlencoded'}});
  }
}
