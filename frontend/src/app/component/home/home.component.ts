import { Component, OnInit } from '@angular/core';
import { ImagesService } from '../../services/images.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {
  data = [];

  constructor(private imagesService: ImagesService) {}

  saveData() {
    this.imagesService.getData().subscribe( (res:any) => {
      this.data = res;
    })
  }
  ngOnInit(): void {
    this.saveData();
    console.log(this.data)
  }
}
