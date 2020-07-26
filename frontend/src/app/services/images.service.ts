import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root',
})
export class ImagesService {
  constructor(private http: HttpClient) {}

  url = 'http://localhost:8000/api/imagen';

  getData() {
    return this.http.get(this.url);
  }
  addData(body) {
    return this.http.post(this.url + '/add', body);
  }
  deteleData(id) {
    return this.http.delete(this.url + '/delete/' + id);
  }
  getById(id) {
    return this.http.get(this.url + '/detail/' + id);
  }
  updateData(id, body) {
    return this.http.put(this.url + '/update/' + id, body);
  }
}
