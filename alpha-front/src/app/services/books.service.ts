import { Injectable, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Books } from '../interfaces/books';

const httpOptions = {
  headers: new HttpHeaders({ 'content-type': 'application/json' }),
};

@Injectable({
  providedIn: 'root',
})
export class BooksService {
  apiURL: string = 'https://127.0.0.1:8000/api/books';
  books: Books[];
  constructor(private http: HttpClient) {}

  bookList(): Observable<Books[]> {
    console.log(this.http.get<Books[]>(this.apiURL));
    return this.http.get<Books[]>(this.apiURL);
  }
}
