import { Component, OnInit } from '@angular/core';
import { CoachService } from './services/coach.service';

@Component({
  selector: 'app-tables-widget9',
  templateUrl: './tables-widget9.component.html',
})
export class TablesWidget9Component implements OnInit {
  public coaches;
  public selectedCoach;

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

  // Set the coach to be edited
  editCoach(coach) {
    this.selectedCoach = { ...coach }; // Make a copy of the coach object
  }

  updateCoach() {
    if (!this.selectedCoach) return;

    this.coachService.updateCoach(this.selectedCoach)
      .subscribe(
        () => {
          // Show success alert
          alert('Coach updated successfully!');

          // Reload coaches data
          this.loadCoaches();
        },
        err => {
          console.log('Error updating coach:', err);

          // Show error alert
          alert('Error updating coach. Please try again later.');
        }
      );
  }
}
