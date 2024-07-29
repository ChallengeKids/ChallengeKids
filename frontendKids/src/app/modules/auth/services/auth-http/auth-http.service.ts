import { Injectable } from '@angular/core';
import { map, Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { UserModel } from '../../models/user.model';
import { environment } from '../../../../../environments/environment';
import { AuthModel } from '../../models/auth.model';
import { consumerAfterComputation } from '@angular/core/primitives/signals';

const API_USERS_URL = `${environment.backednUrl}/api`;

@Injectable({
  providedIn: 'root',
})
export class AuthHTTPService {
  constructor(private http: HttpClient) {}

  // public methods
  login(email: string, password: string): Observable<AuthModel> {
    return this.http
      .post<{ token: string; refresh_token: string }>(
        `${API_USERS_URL}/login_check`,
        { email, password },
        { headers: new HttpHeaders({ 'Content-Type': 'application/json' }) }
      )
      .pipe(
        map((response) => {
          const authModel = new AuthModel();
          authModel.authToken = response.token;
          authModel.refreshToken = response.refresh_token;

          return authModel;
        })
      );
  }

  // CREATE =>  POST: add a new user to the server
  createUser(user: UserModel) {
    const newUser = {
      userType: 'kid',
      firstName: user.fullname,
      secondName: user.fullname,
      email: user.email,
      agreeTerms: true,
      plainPassword: user.password,
      birthDate: '02-09-2003',
      _token: 'string',
    };
    console.log('we we');
    return this.http.post<any>(
      `${API_USERS_URL}/register`,
      JSON.stringify(newUser)
    );
  }

  // Your server should check email => If email exists send link to the user and return true | If email doesn't exist return false
  forgotPassword(email: string): Observable<boolean> {
    return this.http.post<boolean>(`${API_USERS_URL}/forgot-password`, {
      email,
    });
  }

  getUserByToken(token: string): Observable<UserModel> {
    const httpHeaders = new HttpHeaders({
      Authorization: `Bearer ${token}`,
    });
    return this.http.get<UserModel>(`${API_USERS_URL}/kid/profile`, {
      headers: httpHeaders,
    });
  }
}
