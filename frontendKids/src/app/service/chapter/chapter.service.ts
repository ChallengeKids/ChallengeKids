import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class ChapterService {

  constructor(private http: HttpClient) { }

  private url = environment.apiUrl;

  getChapters(): Observable<Comment[]> {
    return this.http.get<Comment[]>(`${this.url}/chapter`);
  }
}
