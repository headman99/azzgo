import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ThunderdealsPage } from './thunderdeals.page';

describe('ThunderdealsPage', () => {
  let component: ThunderdealsPage;
  let fixture: ComponentFixture<ThunderdealsPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ThunderdealsPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ThunderdealsPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
