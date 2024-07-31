import { Component, OnInit } from '@angular/core';
import { CoachService } from './services/coach.service';

@Component({
  selector: 'app-coach',
  templateUrl: './coach.component.html',
})
export class CoachComponent implements OnInit {
  public coaches;
  public isEditing: boolean = false;
  public selectedCoach: any = null;
  public confirmPassword: string = '';

  constructor(private coachService: CoachService) {}

  ngOnInit() {
    this.loadCoaches();
  }

  loadCoaches() {
    this.coachService.getCoaches()
      .subscribe(
        data => {
          this.coaches = data;
          console.log('Coach data:', this.coaches); // Logs the coach data to the console
        },
        err => {
          console.log('Error fetching coaches:', err);
        }
      );
  }

  deleteCoach(id: number) {
    this.coachService.deleteCoach(id)
      .subscribe(
        () => {

          this.coaches = this.coaches.filter(coach => coach.id !== id);

          console.log(`Coach with ID ${id} deleted`);

          alert('Coach deleted successfully!');

          window.location.reload();
        },
        err => {

          console.log('Error deleting coach:', err);

          alert('Error deleting coach. Please try again later.');
        }
      );
  }

  editCoach(coach: any) {
    this.selectedCoach = { ...coach }; // Create a copy of the coach object to edit
    this.isEditing = true; // Show the edit form
    this.confirmPassword = ''; // Clear the confirm password field
  }

  saveCoach() {
    if (this.selectedCoach.password !== this.confirmPassword) {
      alert('Passwords do not match!');
      return;
    }
  
    const { confirmPassword, ...coachData } = this.selectedCoach; // Exclude confirmPassword
  
    this.coachService.updateCoach(coachData)
      .subscribe(
        () => {
          const index = this.coaches.findIndex(c => c.id === this.selectedCoach.id);
          if (index > -1) {
            this.coaches[index] = this.selectedCoach;
          }
          this.isEditing = false;
          this.selectedCoach = null;
          this.confirmPassword = '';
          alert('Coach updated successfully!');
        },
        err => {
          console.error('Error updating coach:', err);
          alert('Error updating coach. Please try again later.');
        }
      );
  }
  
  cancelEdit() {
    this.isEditing = false;
    this.selectedCoach = null;
    this.confirmPassword = '';
  }

}
