import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root',
})
export class HttpserviceService {
  constructor(private http: HttpClient) {}

  get(endPoint: string) {
    return this.http.get(`${environment.backednUrl}${endPoint}`);
  }
  post(endPoint: string, body: object) {
    return this.http.post(`${environment.backednUrl}${endPoint}`, body);
  }
  delete(endPoint: string) {
    return this.http.delete(`${environment.backednUrl}${endPoint}`);
  }
  put(endPoint: string, body: object) {
    return this.http.put(`${environment.backednUrl}${endPoint}`, body);
  }
}
