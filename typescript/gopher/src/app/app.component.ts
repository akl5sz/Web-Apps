import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { NgFor } from '@angular/common'
import { ReactiveFormsModule, FormControl } from '@angular/forms';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, NgFor, ReactiveFormsModule],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'gophers';
  today = '4/17/2024';
  classDays = [{"name":"Tuesday"},{"name":"Thursday"}];
  userName = new FormControl('a');
}