import { Component, OnInit } from '@angular/core';
import { ImagesService } from '../../services/images.service';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
declare var $: any;

@Component({
  selector: 'app-update-card',
  templateUrl: './update-card.component.html',
  styleUrls: ['./update-card.component.scss'],
})
export class UpdateCardComponent implements OnInit {
  message: Array<any> = [];
  id: Number;
  title: String;
  description: String;
  url: String;
  category: String;

  constructor(private imagesService: ImagesService, private router: Router) {}

  ngOnInit(): void {
    this.fillForm();
  }

  getUrl() {
    const actual = window.location + '';
    const split = actual.split('/');
    const id = Number(split[split.length - 1]);
    this.id = id;
    return id;
  }
  fillForm() {
    this.getUrl();
    this.imagesService.getById(this.id).subscribe((res: any) => {
      res.datos.forEach((element) => {
        this.title = element.title;
        this.description = element.description;
        this.url = element.url;
        this.category = element.category;
      });
    });
  }
  updateCard(updateForm: NgForm) {
    this.imagesService.updateData(this.id, updateForm.value).subscribe(
      () => {
        this.message.push('Tarjeta actualizada con exito');
        $('.notification').show();
        setTimeout(() => {
          $('.notification').hide();
          this.router.navigate(['/']);
        }, 3000);
      },
      (err) => {
        this.message = Object.values(err['error']);
        $('.notification').show();
        setTimeout(() => {
          $('.notification').hide();
        }, 5000);
      }
    );
  }
}
