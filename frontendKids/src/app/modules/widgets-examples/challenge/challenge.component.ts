import { Component, OnInit } from '@angular/core';
import { ChallengeService } from './services/challenge.service';

@Component({
  selector: 'app-challenge',
  templateUrl: './challenge.component.html',
})
export class ChallengeComponent implements OnInit {
  public challenges;
  public selectedChallenge;
  public isViewing: boolean = false;

  constructor(private challengeService: ChallengeService) {}

  ngOnInit() {
    this.loadChallenges();
  }

  loadChallenges() {
    this.challengeService.getChallenges().subscribe(
      (data) => {
        this.challenges = data;
      },
      (err) => {
        console.error('Error fetching challenges:', err);
      }
    );
  }

  deleteChallenge(id: number) {
    this.challengeService.deleteChallenge(id)
      .subscribe(
        () => {

          this.challenges = this.challenges.filter(challenge => challenge.id !== id);

          console.log(`Challenge with ID ${id} deleted`);

          alert('challenge deleted successfully!');

          window.location.reload();
        },
        err => {

          console.log('Error deleting challenge:', err);

          alert('Error deleting challenge. Please try again later.');
        }
      );
  }

  viewChallenge(challengeId: number) {
    this.challengeService.getChallengeById(challengeId).subscribe(
      (challenge) => {
        this.selectedChallenge = challenge;
        this.isViewing = true;
      },
      (err) => {
        console.error('Error fetching challenge details:', err);
      }
    );
  }

}
