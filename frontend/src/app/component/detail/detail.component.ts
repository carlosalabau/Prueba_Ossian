import { Component, OnInit } from '@angular/core';
import { ImagesService } from 'src/app/services/images.service';

@Component({
  selector: 'app-detail',
  templateUrl: './detail.component.html',
  styleUrls: ['./detail.component.scss'],
})
export class DetailComponent implements OnInit {

  id: Number;
  data: Array<any> = []

  constructor(private imagesService: ImagesService) {}

  getUrl() {
    const actual = window.location + '';
    const split = actual.split('/');
    const id = Number(split[split.length - 1]);
    this.id = id;
    return id;
  }
  detailById() {
    this.getUrl();
    this.imagesService.getById(this.id).subscribe((res:any)=>{
      this.data = res.datos;
    })
  }

  ngOnInit(): void {
    this.detailById();
  }
}
