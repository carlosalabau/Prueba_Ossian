import { Component, OnInit, ViewChild, ElementRef } from '@angular/core';
import { ImagesService } from '../../services/images.service';
import { NgForm } from '@angular/forms';
declare var $: any;

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {
  data: Array<any> = [];
  dataId: Array<any> = [];
  id: Number;
  card: Object = {};
  message: Array<any>;

  constructor(private imagesService: ImagesService) {}

  saveData() {
    this.imagesService.getData().subscribe((res: any) => {
      this.data = res.datos;
    });
  }
  deleteCard(id) {
    this.imagesService.deteleData(id).subscribe(() => {
      this.saveData();
    });
  }
  ngOnInit(): void {
    this.saveData();
  }
}
