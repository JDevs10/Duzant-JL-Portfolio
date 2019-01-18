import { Injectable } from '@angular/core';
import { Skills } from './mock/skills';
import { Observable, of } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class SkillsService {

  private url = 'http://localhost/JL-Portfolio-Angular/Symfony-API/public';

  constructor(private http: HttpClient) { }

  getSkills(): Observable<Skills[]> {
    /*convertir cette methode pour utiller HttpClient
    return of(POSTS);*/
    return this.http.get<Skills[]>(this.url+"/api/skills", {headers: {'Content-Type': 'application/x-www-form-urlencoded'}});
  }
}
