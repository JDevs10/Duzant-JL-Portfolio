import { Injectable } from '@angular/core';
import { Project } from './mock/projects';
import { Observable, of } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ProjectsService {

  private url = 'http://localhost/MyPortfolio-V-Angular/Silex-Symfony/web/index.php';

  constructor(private http: HttpClient) { }

  getPosts(): Observable<Project[]> {
    /*convertir cette methode pour utiller HttpClient
    return of(POSTS);*/
    return this.http.get<Project[]>(this.url+"/api/projects", {headers: {'Content-Type': 'application/x-www-form-urlencoded'}});
  }
}
