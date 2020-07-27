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
  card = {};
  title: String;
  description: String;
  url: String;
  category: String;

  constructor(private imagesService: ImagesService) {}

  getId(id, data) {
    this.id = id;
    this.title = data.title;
    this.description = data.description;
    this.category = data.category;
    this.url = data.url;
  }
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
  updateCard(updateForm: NgForm) {
    this.imagesService.updateData(this.id, updateForm.value).subscribe(() => {
      $('#exampleModal').modal('hide');
      this.saveData();
    });
  }
  ngOnInit(): void {
    this.saveData();
  }
}
