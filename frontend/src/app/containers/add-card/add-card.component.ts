import { Component, OnInit } from '@angular/core';
import { NgForm, Validators, FormBuilder, FormGroup } from '@angular/forms';
import { ImagesService } from '../../services/images.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-add-card',
  templateUrl: './add-card.component.html',
  styleUrls: ['./add-card.component.scss'],
})
export class AddCardComponent implements OnInit {
  form: FormGroup;
  noValido: boolean = false;
  constructor(
    private imagesService: ImagesService,
    private router: Router,
    private formBuilder: FormBuilder
  ) {}

  ngOnInit(): void {
    this.form = this.formBuilder.group({
      title: ['', Validators.required],
      description: ['', Validators.required],
      category: ['', Validators.required],
      url: ['', Validators.required],
    });
  }
  get f() {
    return this.form.controls;
  }

  addCard(addForm: NgForm) {
    this.noValido = true;
    if (this.form.invalid) {
      return;
    }
    this.imagesService.addData(addForm.value).subscribe((res: any) => {
      this.router.navigate(['/']);
    });
  }
}
