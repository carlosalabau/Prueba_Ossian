import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import {ImagesService} from '../../services/images.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-add-card',
  templateUrl: './add-card.component.html',
  styleUrls: ['./add-card.component.scss']
})
export class AddCardComponent implements OnInit {
  constructor(private imagesService: ImagesService,private router: Router) { }

  ngOnInit(): void {
    
  }
  addCard(addForm: NgForm){
    console.log(addForm.value)
    this.imagesService.addData(addForm.value).subscribe((res:any)=>{
      this.router.navigate(['/']);
    })
  }

}
