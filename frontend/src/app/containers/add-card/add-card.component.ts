import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { ImagesService } from '../../services/images.service';
import { Router } from '@angular/router';
declare var $: any;

@Component({
  selector: 'app-add-card',
  templateUrl: './add-card.component.html',
  styleUrls: ['./add-card.component.scss'],
})
export class AddCardComponent implements OnInit {
  message: Array<any> = [];

  constructor(private imagesService: ImagesService, private router: Router) {}

  ngOnInit(): void {}

  addCard(addForm: NgForm) {
    this.imagesService.addData(addForm.value).subscribe(
      (res: any) => {
        this.message.push('Tarjeta creada con exito');
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
