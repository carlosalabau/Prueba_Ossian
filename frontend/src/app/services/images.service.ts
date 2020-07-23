import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ImagesService {

  constructor(private http: HttpClient) { }

    url = 'http://localhost:8000/api/imagen';

    getData(){
      return this.http.get(this.url);
    }

}
