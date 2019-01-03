import { Injectable } from '@angular/core';
import { Education } from './mock/education';
import { Observable, of } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class EducationService {

  private url = 'http://localhost/MyPortfolio-V-Angular/Silex-Symfony/web/index.php';

  constructor(private http: HttpClient) { }

  getEducation(): Observable<Education[]> {
    /*convertir cette methode pour utiller HttpClient
    return of(POSTS);*/
    return this.http.get<Education[]>(this.url+"/api/education", {headers: {'Content-Type': 'application/x-www-form-urlencoded'}});
  }
}
